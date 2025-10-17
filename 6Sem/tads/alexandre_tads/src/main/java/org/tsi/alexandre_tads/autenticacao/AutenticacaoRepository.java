package org.tsi.alexandre_tads.autenticacao;

import org.springframework.data.repository.Repository;
import org.tsi.alexandre_tads.usuario.Usuario;

public interface AutenticacaoRepository extends Repository<Usuario,Long> {
	Usuario findByEmail(String email);
}
