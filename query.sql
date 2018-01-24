INSERT INTO `recibidos` (`id`, `id_recibido`, `tipo`, `f_creacion`, `codigo`, `remitente`, `adjunto`, `file`, `observacion`, `referencia`, `accion`, `estado`, `id_user_destino`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Carta', '2018-01-08', 'R-001', 'Administración Edificio', 'Acta', '001-Copropietarios Edif. Tango-Acta de Reunión de Copropietarios e Inquilinos 27-12-2017', '', 'Acta de Reunion Copropietarios', 'Reg. Correspondencia', 'Abierto', '4', '2018-01-08 00:00:00', NULL);


INSERT INTO `procesos` (`id`, `accion`, `estado`, `referencia`, `id_recibido`, `id_user`, `id_user_destino`, `created_at`, `updated_at`) VALUES (NULL, 'Reg. Correspondencia', 'Abierto', 'Acta de Reunion Copropietarios', '1', '2', '4', '2018-01-08 00:00:00', NULL);
