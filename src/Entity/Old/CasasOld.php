<?php

namespace App\Entity\Old;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasOld
 *
 * @ORM\Table(name="casas_old", indexes={@ORM\Index(name="id_categoria", columns={"id_categoria"})})
 * @ORM\Entity
 */
class CasasOld
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="id_paises", type="text", length=0, nullable=false)
     */
    private $idPaises;

    /**
     * @var int
     *
     * @ORM\Column(name="responsable", type="integer", nullable=false)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="bono", type="string", length=255, nullable=false)
     */
    private $bono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=255, nullable=true)
     */
    private $usuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="metodo_cobro", type="string", length=255, nullable=true)
     */
    private $metodoCobro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="procedimiento_pago", type="string", length=255, nullable=true)
     */
    private $procedimientoPago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contacto", type="string", length=255, nullable=true)
     */
    private $contacto;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_feed_cuotas", type="boolean", nullable=false)
     */
    private $activoFeedCuotas = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="feed_cuotas", type="string", length=255, nullable=true)
     */
    private $feedCuotas;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_feed_streaming", type="boolean", nullable=false)
     */
    private $activoFeedStreaming = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="feed_streaming", type="string", length=255, nullable=true)
     */
    private $feedStreaming;

    /**
     * @var string|null
     *
     * @ORM\Column(name="baseline", type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
     * @var bool
     *
     * @ORM\Column(name="requiere_factura", type="boolean", nullable=false)
     */
    private $requiereFactura = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoria", referencedColumnName="id")
     * })
     */
    private $idCategoria;


}
