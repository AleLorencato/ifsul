package model;

public class ClientePessoaFisica extends Cliente{
	private String cpf;

	private int quantidadeDeAcoes;

	public ClientePessoaFisica(String nome, String sobrenome, String email, String cpf) {
		super(nome, sobrenome, email);
		this.cpf = cpf;
	}

	public ClientePessoaFisica(String nome, String sobrenome, String email) {
		super(nome, sobrenome, email);
	}

	public String getCpf() {
		return cpf;
	}

	public void setCpf(String cpf) {
		this.cpf = cpf;
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

	@Override
	public String toString() {
		return "\nClientePessoaFisica{" +
				"cpf='" + cpf + '\'' +
				", quantidadeDeAcoes=" + quantidadeDeAcoes +
				", nome='" + nome + '\'' +
				", sobrenome='" + sobrenome + '\'' +
				", email='" + email + '\'' +
				'}';
	}
}
