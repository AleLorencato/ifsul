package model;

public class EnderecoDeEntrega extends Endereco {

	public EnderecoDeEntrega(String tipoDeLogradouro, String logradouro, String numero, String bairro, String cep,
			Cidade cidade, Uf uf) {
		super(tipoDeLogradouro, logradouro, numero, bairro, cep, cidade, uf);
	}

	@Override
	public String toString() {
		return "\nEnderecoDeEntrega{" +
				"tipoDeLogradouro='" + tipoDeLogradouro + '\'' +
				", logradouro='" + logradouro + '\'' +
				", numero='" + numero + '\'' +
				", bairro='" + bairro + '\'' +
				", cep='" + cep + '\'' +
				", cidade=" + cidade +
				", uf=" + uf +
				'}';
	}
}
