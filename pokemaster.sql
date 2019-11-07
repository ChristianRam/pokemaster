-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2019 a las 04:19:00
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokemaster`
--
CREATE DATABASE IF NOT EXISTS `pokemaster` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pokemaster`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `contraseña` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `contraseña`) VALUES
(2, 'Andrea', 'Ramirez', '$2y$10$SIJBqc0Kdxdwy05dRdxEROTAWhtKnNdlsrRrL77n2ImLMWhxNAgDy'),
(3, 'Steven', 'Ramirez', '$2y$10$/snwj5hmRDPok7OvzqWXOOxDsV55EuBBNFuZ/LNyV.4kiqMOXboXm'),
(4, 'Angie', 'Ramirez', '$2y$10$pP6oNk2PlSx6B5csflHVtOdu7RiEMjUjXE4EFzp5GIPLNzc5nDsSe'),
(5, 'Rodrigo', 'Ramirez', '$2y$10$ydWIl2evHCHZikmR8bx63eOAb7bdI0NSDY3KPfWsVheQjuW0CVVj6'),
(6, 'Luz', 'Devia', '$2y$10$rzfLskCBVMKJ0PRWGHJBYO42yvBH9MuzYE5JqYknZlVvQYPk.uWw2'),
(7, 'jose', 'ramos', '$2y$10$YXpGk9fRqF/eRlcQcAZV3.hrh6/13v7LwAz6iOk5QZOkDWME.BsvO'),
(8, 'andres', 'rojas', '$2y$10$fvPHMZBsqlRbuQp26LPaE.p8fEf5GCEYaVDrQ6FmYHK.j95Jia7C6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distincion`
--

CREATE TABLE `distincion` (
  `id` int(11) NOT NULL,
  `nombre_distincion` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distincion`
--

INSERT INTO `distincion` (`id`, `nombre_distincion`, `descripcion`) VALUES
(1, 'Líder de gimnasio', 'Estos entrenadores, hábiles en batalla y difíciles de derrotar, son entrenadores aprobados por la Liga Pokémon.'),
(2, 'Alto Mando', 'Estos entrenadores son considerados superiores y aún más poderosos que los líderes de gimnasio, solo puedes enfrentarte a ellos si tienes las 8 medallas correspondientes.'),
(3, 'Campeón de la Liga Pokémon', 'Consagrado como el mejor entrenador Pokémon de su región por sus habilidades en combate y capacidad de liderazgo.'),
(4, 'As del Frente Batalla', 'Son los mejores entrenadores, se encuentran en algunas regiones, y son excepcionalmente difíciles de vencer.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `id_region` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `experiencia` int(11) NOT NULL,
  `id_distincion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id`, `nombre`, `apellido`, `alias`, `id_region`, `descripcion`, `experiencia`, `id_distincion`) VALUES
(6, 'helmer', 'torres', 'byakox', 8, 'asdasda3', 45, 3),
(16, 'Christian', 'Ramirez', 'xtive', 13, 'asasdasd', 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador_pokemones`
--

CREATE TABLE `entrenador_pokemones` (
  `id_entrenador_pokemones` int(11) NOT NULL,
  `id_entrenador` int(11) NOT NULL,
  `id_pokemon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenador_pokemones`
--

INSERT INTO `entrenador_pokemones` (`id_entrenador_pokemones`, `id_entrenador`, `id_pokemon`) VALUES
(1, 16, 1),
(2, 16, 3),
(3, 16, 4),
(4, 16, 5),
(5, 16, 11),
(6, 16, 9),
(9, 16, 19),
(10, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemones`
--

CREATE TABLE `pokemones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `habitat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pokemones`
--

INSERT INTO `pokemones` (`id`, `nombre`, `id_tipo`, `descripcion`, `habitat`) VALUES
(1, 'Bulbasaur', 12, 'Cuadrúpedo de color verde y manchas más oscuras de formas geométricas. Su cabeza representa cerca de un tercio de su cuerpo.', 'Pradera'),
(2, 'Charmander', 7, 'Pequeño lagarto bípedo. Sus características de fuego son resaltadas por su color de piel anaranjado y su cola con la punta envuelta en llamas.', 'Montaña'),
(3, 'Charizard', 7, 'Es muy presuntuoso, violento, agresivo y muy orgulloso. Es tanto así, que no es capaz de pelear contra un Pokémon más débil que él.', 'Montaña'),
(4, 'Squirtle', 2, 'Son pequeñas tortugas color celeste con caparazones color café o rojas en algunos casos, con una cola enrollada que los distingue.', 'Agua dulce'),
(5, 'Caterpie', 3, 'Tiene pequeños pies con ventosas en sus extremos que le permiten trepar árboles y paredes sin mayor esfuerzo.', 'Bosque'),
(6, 'Rattata', 11, 'Extremadamente común y se reproduce muy rápido, por lo que el contacto visual con uno de ellos indica la presencia de más de 40 de ellos en el área.', 'Pradera'),
(7, 'Pikachu', 5, 'Almacena una gran cantidad de electricidad en sus mejillas. Estas parecen cargarse eléctricamente durante la noche mientras duerme.', 'Bosque'),
(8, 'Nidoran', 17, 'Desarrolla músculos para el movimiento de sus orejas. Gracias a ello sus orejas pueden moverse libremente hacia cualquier dirección, por esto, ni el más mínimo de los sonidos se le escapa.', 'Pradera'),
(9, 'Diglett', 16, 'Diglett es un Pokémon con forma de topo. Pasa la mayor parte de su vida bajo tierra. Su cuerpo es de color marrón y tiene forma de dedo.', 'Caverna'),
(10, 'Mankey', 10, 'Mankey está basado en un mono y, al igual que su evolución, en un luchador de Muay Thai.', 'Montaña'),
(11, 'Alakazam', 13, 'Se caracteriza por un gran poder mental. Posee dos cucharas, una en cada mano, que aumentan sus poderes psíquicos.', 'Ciudad'),
(12, 'Dratini', 4, 'Habita en las profundidades de mares o lagos. Curiosamente, una de estas colonias es una zona de agua en concreto de la Zona Safari.', 'Agua dulce'),
(13, 'Umbreon', 15, 'Tiene todo su pelaje de color negro, exceptuando circunferencias de un color amarillo, que puede iluminar a su voluntad.', 'Ciudad'),
(14, 'Granbull', 8, 'Se caracteriza principalmente por su musculosa mandíbula la cual tiene una fuerza impresionante y por sus colmillos inferiores que sobresalen de su boca.', 'Ciudad'),
(15, 'Dusclops', 6, 'Es capaz de absorber cualquier cosa a su interior, ya que en el centro de su cuerpo tiene un agujero negro con un gigantesco vacío.', 'Bosque'),
(16, 'Regirock', 14, 'Este Pokémon es muy extraño porque no se alimenta, no bebe, y no respira.', 'Caverna'),
(17, 'Rayquaza', 4, 'Es un dragón serpentiforme con dos extremidades superiores, nueve pares de alas aparentemente rígidas', 'Raro'),
(18, 'Regice', 9, 'Esta hecho de hielo inderretible formado en la era de hielo.', 'Caverna'),
(19, 'Absol', 15, 'Tiene un cuerno en forma de media luna a un lado de la cabeza, garras, una extraña cola con forma de cimitarra y está recubierto de un abundante pelo de color blanco.', 'Montaña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `capital` varchar(45) DEFAULT NULL,
  `nombre_region` varchar(45) NOT NULL,
  `profesor` varchar(100) DEFAULT NULL,
  `villano` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `liga` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `capital`, `nombre_region`, `profesor`, `villano`, `descripcion`, `liga`) VALUES
(1, 'Azafrán', 'Kanto', 'Profesor Oak', 'Equipo Rocket', 'Es una región del mundo Pokémon situada al este de Johto y al sur de Sinnoh. Su paisaje está inspirado en la zona de Japón del mismo nombre, la región de Kanto.', 'Liga de Kanto'),
(2, 'Trigal', 'Jotho', 'Profesor Elm', 'Equipo Rocket', 'Es una región del mundo Pokémon situada al oeste de Kanto. Su paisaje está inspirado en la zona de Japón llamada región de Kinki y el oeste de la región de Tokai.', 'Liga de Jotho'),
(3, NULL, 'Hoenn', 'Profesor Abedul', 'Equipo Magma', 'Es una región del Mundo Pokémon. Está localizada al sur de Sinnoh. La mayoría de ciudades y pueblos de Hoenn están inmersos en la naturaleza, por lo que no hay muchas ciudades grandes.', 'Liga de Hoenn'),
(4, NULL, 'Sinnoh', 'Profesor Serbal', 'Equipo Galaxia', 'Sinnoh es la región más grande y, al igual que sucede con la región de Hoenn, sus ciudades y pueblos no siguen una regla general a la hora de nombrarse', 'Liga de Sinnoh'),
(5, 'Porcelana', 'Teselia', 'Profesora Encina', 'Equipo Plasma', 'Es una región moderna y grande, cuenta con una gran variedad de climas, que también cuenta con pueblos, bosques, montańas y un desierto entre otros. Está separada por 2 grandes ríos, que la divide ', 'Liga de Teselia'),
(6, 'Luminalia', 'Kalos', 'Profesor Ciprés', 'Equipo Flare', 'Kalos presenta la mayor población de cualquier región, así como la variedad más amplia de especies Pokémon, que proceden de todo el mundo.', 'Liga de Kalos'),
(7, NULL, 'Alola', 'Profesor kukui', 'Equipo Skull', 'Es una región del mundo Pokémon compuesta por cuatro islas naturales: Melemele, Akala, Ula-Ula, y Poni, además de una pequeńa isla artificial: el Paraíso Aether.', 'Liga de Alola'),
(8, NULL, 'Aura', 'Profesor Cío', 'Equipo Cepo', 'Esta región está dividida en un largo y árido desierto y una área completamente verde.', 'Liga de Aura'),
(9, NULL, 'Floresta', 'Profesor Gobios', 'Equipo Go-Rock', 'Está dividida en cuatro ciudades: Villavera, Otonia, Villaestío e Hiberna.', NULL),
(10, NULL, 'Almia', 'Profesor Gobios', 'Equipo Pocalux', 'En Almia se encuentran en estado salvaje diversos Pokémones, como en Floresta, aquí no hay entrenadores', NULL),
(11, NULL, 'Oblivia', 'Profesor Gobios', 'Equipo Nappers', 'Es una región llena de islas y ruinas diferentes para que el jugador las descubra.', NULL),
(12, NULL, 'Sol', 'Profesor P', NULL, 'En esta región no parece conocerse la presencia de Pokémon salvajes o entrenadores Pokémon, aunque no está completamente ajena a los Pokémon', NULL),
(13, NULL, 'Ransei', NULL, 'Varía', 'La región está dividida en 17 reinos, cada uno con su propio jefe militar. Cada uno de estos reinos representa un tipo elemental distinto, que se ve reflejado en las especialidades de los jefes miliar', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pokemon`
--

CREATE TABLE `tipo_pokemon` (
  `id` int(11) NOT NULL,
  `nombre_tipo` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_pokemon`
--

INSERT INTO `tipo_pokemon` (`id`, `nombre_tipo`, `descripcion`) VALUES
(1, 'Acero', 'Los Pokémon de tipo acero destacan por tener altas defensas, pero también por poseer poca velocidad.'),
(2, 'Agua', 'Se dice que es puro y que suele adaptarse a cualquier situación o condición climática, ya que el agua puede adoptar cualquier forma en cualquier momento.'),
(3, 'Bicho', 'Se caracteriza por su crecimiento rápido ya que no tardan mucho en evolucionar, viven en los bosques.'),
(4, 'Dragón', 'Es un tipo elemental ancestral; muchos de los últimos Pokémon legendarios descubiertos, considerados deidades, son del tipo dragón.'),
(5, 'Eléctrico', ' Tienen hábitats variados, desde bosques, praderas, ciudades y centrales eléctricas.'),
(6, 'Fantasma', 'Se caracteriza por ser un tipo con pocos Pokémon y movimientos, también porque sus Pokémon poseen pocos PS.'),
(7, 'Fuego', 'Basan sus ataques principalmente en el control de este elemento y la mayoría de estos ataques pueden quemar al Pokémon oponente.'),
(8, 'Hada', 'Representa principalmente la pureza y el poder mágico, siendo esto lo más característico de esta especie.'),
(9, 'Hielo', 'Destacan por su gran resistencia y adaptación al medio frío o glaciar, como son las cimas de las montańas, las cavernas y cuevas heladas o incluso los polos.'),
(10, 'Lucha', 'Son especialistas en el combate cuerpo a cuerpo. Se podría decir que son opuestos a los del tipo psíquico.'),
(11, 'Normal', 'El tipo normal abarca la mayor cantidad y variedad de movimientos que el resto de tipos.'),
(12, 'Planta', 'Los Pokémon de tipo planta suelen ser pacíficos pero también son grandes luchadores y pueden envenenar, paralizar o dormir al rival en combate.'),
(13, 'Psíquico', 'Suelen ser muy inteligentes y a menudo se les atribuye capacidades como prever acciones futuras, hacer levitar objetos o incluso a ellos mismos.'),
(14, 'Roca', 'Destaca por su gran defensa frente a ataques físicos. Sin embargo, tiene en su contra que presenta varias debilidades con respecto a otros tipos.'),
(15, 'Siniestro', 'En su mayoría agresivos y misteriosos. Por lo tanto, encontrar un Pokémon salvaje de tipo siniestro es algo complicado.'),
(16, 'Tierra', 'El tipo tierra es, junto al Tipo lucha, el tipo que tiene más ventajas sobre otros tipos.'),
(17, 'Veneno', 'Muchos Pokémon de este tipo pueden expulsar de sus cuerpos distintas sustancias venenosas como gases, ácidos, venenos, esporas y a veces olores malolientes.'),
(18, 'Volador', 'Los Pokémon de tipo volador son rápidos y con ataques que normalmente son de contacto físico, o en los que utilizan el viento a su favor.'),
(19, '???', 'Es un tipo desconocido, tienen el ataque maldición, ningún Pokemón lo posee como propio, a excepción a los huevos.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distincion`
--
ALTER TABLE `distincion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_region_idx` (`id_region`),
  ADD KEY `fk_entrenador_distincion_idx` (`id_distincion`);

--
-- Indices de la tabla `entrenador_pokemones`
--
ALTER TABLE `entrenador_pokemones`
  ADD PRIMARY KEY (`id_entrenador_pokemones`),
  ADD KEY `fk_entrenadorpokemones_entrenador_idx` (`id_entrenador`),
  ADD KEY `fk_entrenadorpokemones_pokemones_idx` (`id_pokemon`);

--
-- Indices de la tabla `pokemones`
--
ALTER TABLE `pokemones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pokemones_tipo_pokemon_idx` (`id_tipo`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_pokemon`
--
ALTER TABLE `tipo_pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `distincion`
--
ALTER TABLE `distincion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `entrenador_pokemones`
--
ALTER TABLE `entrenador_pokemones`
  MODIFY `id_entrenador_pokemones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pokemones`
--
ALTER TABLE `pokemones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_pokemon`
--
ALTER TABLE `tipo_pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `fk_entrenador_distincion` FOREIGN KEY (`id_distincion`) REFERENCES `distincion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entrenador_region` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrenador_pokemones`
--
ALTER TABLE `entrenador_pokemones`
  ADD CONSTRAINT `fk_entrenadorpokemones_entrenador` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entrenadorpokemones_pokemones` FOREIGN KEY (`id_pokemon`) REFERENCES `pokemones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pokemones`
--
ALTER TABLE `pokemones`
  ADD CONSTRAINT `fk_pokemones_tipo_pokemon` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_pokemon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
