package model;

public class ClientePessoaJuridica extends Cliente{
	private String cnpj;
	private int quantidadeDeAcoes;

	public ClientePessoaJuridica(String nome, String sobrenome, String email, String cnpj) {
		super(nome, sobrenome, email);
		this.cnpj = cnpj;
	}

	public ClientePessoaJuridica(String nome, String sobrenome, String email) {
		super(nome, sobrenome, email);
	}

	@Override
	public int getQuantidadeDeAcoes() {
		return this.quantidadeDeAcoes;
	}

	public void setQuantidadeDeAcoes(int quantidadeDeAcoes) {
		this.quantidadeDeAcoes = quantidadeDeAcoes;
	}

	@Override
	public double getValorDaAcao() {
		return 0;
	}

	public String getCnpj() {
		return cnpj;
	}

	public void setCnpj(String cnpj) {
		this.cnpj = cnpj;
	}

	@Override
	public String toString() {
		return "\nClientePessoaJuridica{" +
				"cnpj='" + cnpj + '\'' +
				", quantidadeDeAcoes=" + quantidadeDeAcoes +
				", nome='" + nome + '\'' +
				", sobrenome='" + sobrenome + '\'' +
				", email='" + email + '\'' +
				'}';
	}
}
