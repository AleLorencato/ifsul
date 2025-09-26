package org.tsi.alexandre_tads.anuncio;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.tsi.alexandre_tads.carro.CarroRepository;

@RestController
@RequestMapping("/api/v1/anuncios")
public class AnuncioController {
	private final AnuncioRepository repository;


	public AnuncioController(AnuncioRepository repository) {
		this.repository = repository;
	}

	@GetMapping
	public Iterable<Anuncio> listarAnuncios(){
		return repository.findAll();
	}

	@PostMapping
	public Anuncio criarAnuncio(Anuncio anuncio){
		return repository.save(anuncio);
	}


}
