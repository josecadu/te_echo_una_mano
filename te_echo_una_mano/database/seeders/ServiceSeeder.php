<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            // 🔌 Electricidad
            [
                'familia_Profesional' => 'Electricidad',
                'titulo' => 'Instalación eléctrica completa',
                'descripcion' => 'Renovación del cableado y componentes eléctricos en viviendas o locales.'
            ],
            [
                'familia_Profesional' => 'Electricidad',
                'titulo' => 'Instalación de iluminación LED',
                'descripcion' => 'Sustitución de luminarias antiguas por sistemas LED de bajo consumo.'
            ],
            [
                'familia_Profesional' => 'Electricidad',
                'titulo' => 'Reparación de cortocircuitos',
                'descripcion' => 'Localización de fallos eléctricos y sustitución de componentes dañados.'
            ],

            // 🚰 Fontanería
            [
                'familia_Profesional' => 'Fontanería',
                'titulo' => 'Instalación de termo eléctrico',
                'descripcion' => 'Montaje y conexión de termos eléctricos con puesta en marcha incluida.'
            ],
            [
                'familia_Profesional' => 'Fontanería',
                'titulo' => 'Desatasco de tuberías',
                'descripcion' => 'Limpieza de tuberías de cocina, baño o fregaderos mediante técnicas de presión.'
            ],
            [
                'familia_Profesional' => 'Fontanería',
                'titulo' => 'Reparación de fugas de agua',
                'descripcion' => 'Detección y reparación de fugas en tuberías o juntas con materiales de alta resistencia.'
            ],

            // 🧱 Albañilería
            [
                'familia_Profesional' => 'Albañilería',
                'titulo' => 'Reparación de paredes y grietas',
                'descripcion' => 'Sellado, enlucido y alisado de paredes interiores o exteriores.'
            ],
            [
                'familia_Profesional' => 'Albañilería',
                'titulo' => 'Colocación de azulejos y baldosas',
                'descripcion' => 'Alicatado profesional de cocinas, baños o suelos con cerámica o gres.'
            ],
            [
                'familia_Profesional' => 'Albañilería',
                'titulo' => 'Construcción de tabiques interiores',
                'descripcion' => 'Levantamiento de muros y tabiques en reformas o redistribución de espacios.'
            ],

            // 🎨 Pintura
            [
                'familia_Profesional' => 'Pintura',
                'titulo' => 'Pintura de vivienda completa',
                'descripcion' => 'Pintado de paredes, techos y molduras con pintura plástica lavable o ecológica.'
            ],
            [
                'familia_Profesional' => 'Pintura',
                'titulo' => 'Aplicación de esmalte en puertas y marcos',
                'descripcion' => 'Restauración y pintado de carpintería interior con acabados duraderos.'
            ],
            [
                'familia_Profesional' => 'Pintura',
                'titulo' => 'Eliminación de gotelé y alisado de paredes',
                'descripcion' => 'Alisado completo de superficies con acabado liso profesional.'
            ],

            // 🪚 Carpintería
            [
                'familia_Profesional' => 'Carpintería',
                'titulo' => 'Montaje de muebles a medida',
                'descripcion' => 'Diseño, fabricación e instalación de muebles personalizados de madera.'
            ],
            [
                'familia_Profesional' => 'Carpintería',
                'titulo' => 'Instalación de puertas interiores',
                'descripcion' => 'Montaje de puertas, marcos y herrajes con ajuste y nivelación precisa.'
            ],
            [
                'familia_Profesional' => 'Carpintería',
                'titulo' => 'Reparación de ventanas de madera',
                'descripcion' => 'Restauración de marcos, lijado, sellado y barnizado para prolongar su vida útil.'
            ],

            // ❄️ Climatización
            [
                'familia_Profesional' => 'Climatización',
                'titulo' => 'Instalación de aire acondicionado split',
                'descripcion' => 'Montaje, conexión eléctrica y puesta en marcha de equipos de climatización tipo split.'
            ],
            [
                'familia_Profesional' => 'Climatización',
                'titulo' => 'Mantenimiento de caldera de gas',
                'descripcion' => 'Revisión, limpieza y ajuste de calderas domésticas para mejorar la eficiencia y seguridad.'
            ],

            // 🧼 Limpieza
            [
                'familia_Profesional' => 'Limpieza',
                'titulo' => 'Limpieza de vivienda completa',
                'descripcion' => 'Limpieza integral de pisos o casas, incluyendo cristales, baños y cocina.'
            ],
            [
                'familia_Profesional' => 'Limpieza',
                'titulo' => 'Limpieza post-obra',
                'descripcion' => 'Retirada de restos de pintura, polvo y residuos tras una reforma o construcción.'
            ],

            // 🌿 Jardinería
            [
                'familia_Profesional' => 'Jardinería',
                'titulo' => 'Mantenimiento de jardín',
                'descripcion' => 'Corte de césped, poda, abonado y mantenimiento de plantas ornamentales.'
            ],
            [
                'familia_Profesional' => 'Jardinería',
                'titulo' => 'Instalación de sistema de riego por goteo',
                'descripcion' => 'Diseño e instalación de sistemas de riego automatizado para jardines y terrazas.'
            ],

            // 💻 Informática
            [
                'familia_Profesional' => 'Informática',
                'titulo' => 'Instalación de red doméstica',
                'descripcion' => 'Configuración de routers, puntos de acceso y cableado de red para conexión estable en todo el hogar.'
            ],
        ];
        foreach ($servicios as $servicio) {
            Service::create($servicio);
        }
    }
}
