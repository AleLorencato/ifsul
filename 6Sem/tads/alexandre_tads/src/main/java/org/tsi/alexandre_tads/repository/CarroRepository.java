package org.tsi.alexandre_tads.repository;
import org.springframework.data.jpa.repository.JpaRepository;
import org.tsi.alexandre_tads.model.Carro;
import java.util.UUID;

public interface CarroRepository extends JpaRepository<Carro, UUID> {
}
