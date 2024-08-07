package model;

public class Gerente extends Funcionario{
	private double taxaDeBonificacao;
	private int quantidadeDeAcoes;
	public Gerente(String nome, String sobrenome, double salario, double taxaDeBonificacao) {
		super(nome, sobrenome, salario);
		this.taxaDeBonificacao = taxaDeBonificacao;
	}

	public Gerente(String nome, String sobrenome, double salario) {
		super(nome, sobrenome, salario);
	}

	public double getTaxaDeBonificacao() {
		return taxaDeBonificacao;
	}

	public void setTaxaDeBonificacao(double taxaDeBonificacao) {
		this.taxaDeBonificacao = taxaDeBonificacao;
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
		return "\nGerente{" +
				"taxaDeBonificacao=" + taxaDeBonificacao +
				", quantidadeDeAcoes=" + quantidadeDeAcoes +
				", nome='" + nome + '\'' +
				", sobrenome='" + sobrenome + '\'' +
				", salario=" + salario +
				'}';
	}
}
