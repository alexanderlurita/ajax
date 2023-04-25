<?php

$softwares = [
  [
    "indice"        => 1,
    "nombre"        => "Mozilla Firefox", 
    "desarrollador" => "Chris Hofmann", 
    "plataforma"    => "Web, móvil", 
    "version"       => "112.0",
    "licencia"      => "Pública"
  ],
  [
    "indice"        => 2,
    "nombre"        => "Skype", 
    "desarrollador" => "Janus Friis", 
    "plataforma"    => "Escritorio, móvil", 
    "version"       => "8.94.0.428",
    "licencia"      => "Propietario"
  ],
  [
    "indice"        => 3,
    "nombre"        => "WhatsApp", 
    "desarrollador" => "Jan Koum", 
    "plataforma"    => "Escritorio, web y móvil", 
    "version"       => "2.23.7.14",
    "licencia"      => "Propietario"
  ],
  [
    "indice"        => 4,
    "nombre"        => "Facebook", 
    "desarrollador" => "Mark Zuckerberg", 
    "plataforma"    => "Escritorio, web y móvil", 
    "version"       => "412.0.0.0.5",
    "licencia"      => "BSD"
  ],
  [
    "indice"        => 5,
    "nombre"        => "Discord", 
    "desarrollador" => "Jason Citron", 
    "plataforma"    => "Escritorio, web y móvil", 
    "version"       => "175.16 ",
    "licencia"      => "Freeware"
  ],
  [
    "indice"        => 6,
    "nombre"        => "Twitter", 
    "desarrollador" => "Jack Dorsey", 
    "plataforma"    => "Web y móvil", 
    "version"       => "9.85.0",
    "licencia"      => "Apache"
  ],
  [
    "indice"        => 7,
    "nombre"        => "Instagram", 
    "desarrollador" => "Kevin Systrom", 
    "plataforma"    => "Web y móvil", 
    "version"       => "64.0",
    "licencia"      => "Propietario"
  ]
];

echo json_encode($softwares);

?>