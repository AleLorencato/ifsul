package org.tsi.alexandre_tads.anuncio;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.*;
import org.tsi.alexandre_tads.carro.Carro;
import org.tsi.alexandre_tads.carro.CarroRepository;
import org.tsi.alexandre_tads.usuario.Usuario;
import org.tsi.alexandre_tads.usuario.UsuarioRepository;

import java.util.Date;
import java.util.List;
import java.util.UUID;

@RestController
@RequestMapping("/api/v1/anuncios")
public class AnuncioController {

    private final AnuncioRepository anuncioRepository;
    private final CarroRepository carroRepository;
    private final UsuarioRepository usuarioRepository;

    public AnuncioController(AnuncioRepository anuncioRepository,
                             CarroRepository carroRepository,
                             UsuarioRepository usuarioRepository) {
        this.anuncioRepository = anuncioRepository;
        this.carroRepository = carroRepository;
        this.usuarioRepository = usuarioRepository;
    }


    @GetMapping
	public ResponseEntity<List<AnuncioResponseDTO>> listarAnuncios(){
        List<AnuncioResponseDTO> anuncios = anuncioRepository.findAll().stream()
                .map(AnuncioResponseDTO::fromEntity)
                .toList();
        return ResponseEntity.ok(anuncios);
	}

    @GetMapping("/{id}")
    public ResponseEntity<AnuncioResponseDTO> buscarAnuncioPorId(@PathVariable(name="id") UUID id) {
        return anuncioRepository.findById(id)
                .map(anuncio -> ResponseEntity.ok(AnuncioResponseDTO.fromEntity(anuncio)))
                .orElse(ResponseEntity.notFound().build());
    }


    @PostMapping
    @Transactional
    public ResponseEntity<AnuncioResponseDTO> criarAnuncio(@RequestBody AnuncioRequestDTO requestDTO){
        try {
            Usuario usuario = usuarioRepository.findById(requestDTO.getUsuarioId())
                    .orElseThrow(() -> new RuntimeException("Usuário não encontrado"));

            Carro carro = new Carro();
            carro.setMarca(requestDTO.getMarca());
            carro.setModelo(requestDTO.getModelo());
            carro.setCor(requestDTO.getCor());
            carro.setAno(requestDTO.getAno());
            carro.setQuilometragem(requestDTO.getQuilometragem());
            carro.setCombustivel(requestDTO.getCombustivel());
            carro.setCreatedAt(new Date());
            carro.setUpdatedAt(new Date());

            Anuncio anuncio = new Anuncio();
            anuncio.setTitulo(requestDTO.getTitulo());
            anuncio.setDescricao(requestDTO.getDescricao());
            anuncio.setPreco(requestDTO.getPreco());
            anuncio.setStatus(requestDTO.getStatus());
            anuncio.setCreatedAt(new Date());
            anuncio.setUpdatedAt(new Date());
            anuncio.setCarro(carro);
            anuncio.setUsuario(usuario);

            carro.setAnuncio(anuncio);

            Anuncio anuncioSalvo = anuncioRepository.save(anuncio);

            return ResponseEntity.status(HttpStatus.CREATED)
                    .body(AnuncioResponseDTO.fromEntity(anuncioSalvo));

        } catch (RuntimeException e) {
            return ResponseEntity.badRequest().build();
        }
    }


	@PutMapping("/{id}")
	@Transactional
	public ResponseEntity<AnuncioResponseDTO> atualizarAnuncio(@PathVariable(name="id") UUID id, @RequestBody AnuncioRequestDTO requestDTO){
		return anuncioRepository.findById(id)
				.map(anuncioExistente -> {
					anuncioExistente.setTitulo(requestDTO.getTitulo());
					anuncioExistente.setDescricao(requestDTO.getDescricao());
					anuncioExistente.setPreco(requestDTO.getPreco());
					anuncioExistente.setStatus(requestDTO.getStatus());
					anuncioExistente.setUpdatedAt(new Date());

					Carro carroExistente = anuncioExistente.getCarro();
					if (carroExistente == null) {
						throw new RuntimeException("Carro associado ao anúncio não encontrado.");
					}
					carroExistente.setMarca(requestDTO.getMarca());
					carroExistente.setModelo(requestDTO.getModelo());
					carroExistente.setCor(requestDTO.getCor());
					carroExistente.setAno(requestDTO.getAno());
					carroExistente.setQuilometragem(requestDTO.getQuilometragem());
					carroExistente.setCombustivel(requestDTO.getCombustivel());
					carroExistente.setUpdatedAt(new Date());
					Anuncio anuncioAtualizado = anuncioRepository.save(anuncioExistente);
					return ResponseEntity.ok(AnuncioResponseDTO.fromEntity(anuncioAtualizado));
				})
				.orElse(ResponseEntity.notFound().build());
	}


}
