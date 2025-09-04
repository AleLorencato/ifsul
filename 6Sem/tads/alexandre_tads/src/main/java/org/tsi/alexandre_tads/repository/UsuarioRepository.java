package org.tsi.alexandre_tads.repository;
import org.springframework.data.jpa.repository.JpaRepository;
import org.tsi.alexandre_tads.model.Usuario;

import java.util.UUID;

public interface UsuarioRepository extends JpaRepository<Usuario, UUID> {

}
