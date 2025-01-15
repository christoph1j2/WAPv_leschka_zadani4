CREATE TABLE `preklad` (
            `id` int(11) NOT NULL,
            `cs` varchar(100) NOT NULL,
            `en` varchar(100) NOT NULL,
            `de` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

ALTER TABLE `preklad`
    ADD PRIMARY KEY (`id`);