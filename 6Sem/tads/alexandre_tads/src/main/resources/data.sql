-- Inserção de usuários
INSERT INTO usuarios (
    id, nome, email, senha, cpf, telefone, cidade, estado, cep, created_at, updated_at
) VALUES
      ('b6c0719c-416c-4350-a476-d98ab644fb58', 'João Silva', 'joao@email.com', '123456', '12345678901', '51999999999', 'Porto Alegre', 'RS', '90000-000', '2025-10-09 17:00:00', '2025-10-09 17:00:00'),
      ('a2f2e3d4-5678-4abc-9def-1234567890ab', 'Maria Oliveira', 'maria@email.com', 'abcdef', '98765432100', '51988888888', 'Canoas', 'RS', '92000-000', '2025-10-08 14:30:00', '2025-10-08 14:30:00'),
      ('c4d4e5f6-7890-4bcd-8efa-2345678901bc', 'Carlos Souza', 'carlos@email.com', 'senha123', '45678912300', '51977777777', 'Pelotas', 'RS', '96000-000', '2025-10-07 10:15:00', '2025-10-07 10:15:00'),
      ('d8e5f6a7-8901-4cde-7fab-3456789012cd', 'Ana Lima', 'ana@email.com', 'minhasenha', '32165498700', '51966666666', 'Santa Maria', 'RS', '97000-000', '2025-10-06 09:45:00', '2025-10-06 09:45:00'),
      ('e9f6a7b8-9012-4def-6abc-4567890123de', 'Pedro Martins', 'pedro@email.com', 'senha789', '65498732100', '51955555555', 'Caxias do Sul', 'RS', '95000-000', '2025-10-05 08:20:00', '2025-10-05 08:20:00');

-- Inserção de carros
INSERT INTO carros (
    id, marca, modelo, cor, ano, quilometragem, combustivel, created_at, updated_at
) VALUES
      ('f6a7b8c9-0123-4ef0-5bcd-5678901234ef', 'Honda', 'Civic', 'Branco', 2020, 25000, 'Flex', '2025-10-09 17:00:00', '2025-10-09 17:00:00'),
      ('a7b8c9d0-1234-4f01-4cde-6789012345f0', 'Toyota', 'Corolla', 'Prata', 2019, 30000, 'Gasolina', '2025-10-08 14:30:00', '2025-10-08 14:30:00'),
      ('b8c9d0e1-2345-4f12-3def-7890123456a1', 'Ford', 'Ka', 'Preto', 2018, 40000, 'Flex', '2025-10-07 10:15:00', '2025-10-07 10:15:00'),
      ('c9d0e1f2-3456-4f23-2efa-8901234567b2', 'Chevrolet', 'Onix', 'Vermelho', 2021, 15000, 'Flex', '2025-10-06 09:45:00', '2025-10-06 09:45:00'),
      ('d0e1f2a3-4567-4f34-1fab-9012345678c3', 'Volkswagen', 'Gol', 'Cinza', 2017, 50000, 'Gasolina', '2025-10-05 08:20:00', '2025-10-05 08:20:00');

-- Inserção de anúncios
INSERT INTO anuncios (
    id, titulo, descricao, preco, status, created_at, updated_at, carro_id, usuario_id
) VALUES
      ('aa111111-aaaa-aaaa-aaaa-aaaaaaaaaaaa', 'Honda Civic 2020', 'Carro seminovo em excelente estado', 85000.0, 'ATIVO', '2025-10-09 17:00:00', '2025-10-09 17:00:00', 'f6a7b8c9-0123-4ef0-5bcd-5678901234ef', 'b8c0719c-416c-4350-a476-d98ab644fb58'),
      ('bb222222-bbbb-bbbb-bbbb-bbbbbbbbbbbb', 'Toyota Corolla 2019', 'Completo, único dono', 78000.0, 'ATIVO', '2025-10-08 14:30:00', '2025-10-08 14:30:00', 'a7b8c9d0-1234-4f01-4cde-6789012345f0', 'a1f2e3d4-5678-4abc-9def-1234567890ab'),
      ('cc333333-cccc-cccc-cccc-cccccccccccc', 'Ford Ka 2018', 'Econômico e bem conservado', 45000.0, 'INATIVO', '2025-10-07 10:15:00', '2025-10-07 10:15:00', 'b8c9d0e1-2345-4f12-3def-7890123456a1', 'c3d4e5f6-7890-4bcd-8efa-2345678901bc'),
      ('dd444444-dddd-dddd-dddd-dddddddddddd', 'Chevrolet Onix 2021', 'Baixa quilometragem, garantia de fábrica', 70000.0, 'ATIVO', '2025-10-06 09:45:00', '2025-10-06 09:45:00', 'c9d0e1f2-3456-4f23-2efa-8901234567b2', 'd4e5f6a7-8901-4cde-7fab-3456789012cd'),
      ('ee555555-eeee-eeee-eeee-eeeeeeeeeeee', 'Volkswagen Gol 2017', 'Ideal para o dia a dia', 38000.0, 'INATIVO', '2025-10-05 08:20:00', '2025-10-05 08:20:00', 'd0e1f2a3-4567-4f34-1fab-9012345678c3', 'e5f6a7b8-9012-4def-6abc-4567890123de');
