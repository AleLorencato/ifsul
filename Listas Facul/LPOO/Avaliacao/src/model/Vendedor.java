package model;

public class Vendedor extends Funcionario{
	private double taxaDeComissao;

	private int quantidadeDeAcoes;

	public Vendedor(String nome, String sobrenome, double salario, double taxaDeComissao) {
		super(nome, sobrenome, salario);
		this.taxaDeComissao = taxaDeComissao;
	}

	public Vendedor(String nome, String sobrenome, double salario) {
		super(nome, sobrenome, salario);
	}

	public double getTaxaDeComissao() {
		return taxaDeComissao;
	}

	public void setTaxaDeComissao(double taxaDeComissao) {
		this.taxaDeComissao = taxaDeComissao;
	}

	public void setQuantidadeDeAcoes(int quantidadeDeAcoes) {
		this.quantidadeDeAcoes = quantidadeDeAcoes;
	}

	@Override
	public int getQuantidadeDeAcoes() {
		return this.quantidadeDeAcoes;
	}

	@Override
	public double getValorDaAcao() {
		return 0;
	}

	@Override
	public String toString() {
		return "\nVendedor{" +
				"taxaDeComissao=" + taxaDeComissao +
				", quantidadeDeAcoes=" + quantidadeDeAcoes +
				", nome='" + nome + '\'' +
				", sobrenome='" + sobrenome + '\'' +
				", salario=" + salario +
				'}';
	}
}
