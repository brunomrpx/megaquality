/*
 * username = admin
 * password = teste
 */
INSERT INTO `users` (name, username, password) VALUES ("Administrator", "admin", "$2a$10$tR5yZNYznAEmnPRIDtCZrefwKfu1HYfL4Vw3Ccyjh9E7Dezev/yv.");

INSERT INTO `items` (`description`) VALUES ('Foram executados os monitoramentos nas datas planejadas?'),
                                                                  ('Os Problemas foram registrados e resolvidos conforme definido no processo?'),
                                                                  ('Os riscos estão sendo monitorados?'),
                                                                  ('Mudanças de requisitos estão sendo monitoradas? No caso de uma mudança de requisito está sendo seguido o processo?'),
                                                                  ('O cronograma está sendo monitorado? '),
                                                                  ('Pacotes foram gerados e instalados em ambiente de Homologação?'),
                                                                  ('Os branchs e repositórios onde foi desenvolvido está descrito no link "Desenvolvimento" na página do projeto conforme definido no processo? '),
                                                                  ('Avaliar se a especificação funcional ou técnica possui um link com os fontes conforme definido no processo. '),
                                                                  ('Todos os roteiros de homologação e casos de testes foram testados e registrados? '),
                                                                  ('Os bugs abertos durante o projeto foram corrigidos conforme definido no processo. '),
                                                                  ('Foi criada baseline de inicio do projeto da documentação e fontes já existentes(se houver)? '),
                                                                  ('Foi criada a(s) baseline(s) de entrega do projeto da documentação e fontes? ');

INSERT INTO `checklists` (`name`) VALUES  ('Requisitos'),
                                                                  ('Planejamento'),
                                                                  ('Análise final'),
                                                                  ('Monitoramento'),
                                                                  ('Desenvolvimento'),
                                                                  ('Homologação'),
                                                                  ('Configuração'),
                                                                  ('Encerramento'),
                                                                  ('Portfólio'),
                                                                  ('Medição');

INSERT INTO `checklists_items` (`checklist_id`, `item_id`) VALUES  (1, 1),
                                                                                                    (1, 2),
                                                                                                    (1, 3),
                                                                                                    (1, 4),
                                                                                                    (1, 5),
                                                                                                    (1, 6),
                                                                                                    (2, 1),
                                                                                                    (2, 2),
                                                                                                    (2, 3),
                                                                                                    (2, 4),
                                                                                                    (2, 5),
                                                                                                    (2, 6),
                                                                                                    (2, 7),
                                                                                                    (2, 8),
                                                                                                    (2, 9),
                                                                                                    (3, 4),
                                                                                                    (3, 5),
                                                                                                    (3, 6),
                                                                                                    (3, 7),
                                                                                                    (3, 8),
                                                                                                    (3, 9),
                                                                                                    (3, 10),
                                                                                                    (3, 11),
                                                                                                    (3, 12);
