#!/bin/bash
# Estos datos han de estar en el entorno o deben modificarse para produccion
# Script propio de autoactualización de BBDD (C) Biblioeteca Technologies
user=${USUARIO:-"root"}
password=${CLAVE:-"angelin"}
host=${HOST:-"192.168.1.128"}
port=${PORT:-3306}
db=${BBDD:-"bad_premiumpay2"}

echo "Conectando a BBDD ${db} en ${host}:${port} usuario ${user}"
until mysql $db -h $host -P$port -u $user -p$password -sse "SELECT max(VERSION) FROM DB_VERSION" &> /dev/null
do
  printf "."
  sleep 1
done
echo "Conectado"

version=$(mysql $db -h $host -P$port -u $user -p$password -sse "SELECT max(VERSION) FROM DB_VERSION" 2>/dev/null)
echo "Versión detectada en BBDD: $version"
versiona=$(printf "%03d" $version)
update=`ls update_*.sql | grep $versiona"_"`
while [ "$update" != "" ] ; do
    echo Ejecutando $update
    mysql $db -h $host -P$port -u $user -p$password < $update
    (( version++ )) 
    versiona=$(printf "%03d" $version)
    update=`ls update_*.sql | grep $versiona"_"`
done
echo "Nada más que actualizar"
