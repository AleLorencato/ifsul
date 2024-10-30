package model;

public abstract class Endereco {
	protected String tipoDeLogradouro;
	protected String logradouro;
	protected String numero;
	protected String bairro;
	protected String cep;
	protected Cidade cidade;
	protected Uf uf;

	public Endereco(String tipoDeLogradouro, String logradouro, String numero, String bairro, String cep, Cidade cidade,
			Uf uf) {
		this.tipoDeLogradouro = tipoDeLogradouro;
		this.logradouro = logradouro;
		this.numero = numero;
		this.bairro = bairro;
		this.cep = cep;
		this.cidade = cidade;
		this.uf = uf;
	}

	public String getTipoDeLogradouro() {
		return tipoDeLogradouro;
	}

	public void setTipoDeLogradouro(String tipoDeLogradouro) {
		this.tipoDeLogradouro = tipoDeLogradouro;
	}

	public String getLogradouro() {
		return logradouro;
	}

	public void setLogradouro(String logradouro) {
		this.logradouro = logradouro;
	}

	public String getNumero() {
		return numero;
	}

	public void setNumero(String numero) {
		this.numero = numero;
	}

	public String getBairro() {
		return bairro;
	}

	public void setBairro(String bairro) {
		this.bairro = bairro;
	}

	public String getCep() {
		return cep;
	}

	public void setCep(String cep) {
		this.cep = cep;
	}

	public Cidade getCidade() {
		return cidade;
	}

	public void setCidade(Cidade cidade) {
		this.cidade = cidade;
	}

	public Uf getUf() {
		return uf;
	}

	public void setUf(Uf uf) {
		this.uf = uf;
	}

	@Override
	public String toString() {
		return "Endereco{" +
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
