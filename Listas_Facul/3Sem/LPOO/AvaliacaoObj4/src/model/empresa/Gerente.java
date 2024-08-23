package model.empresa;

import java.math.BigDecimal;

public class Gerente extends Funcionario{
	private double taxaDeBonificacao;
	private Filial filial;

	public Gerente(Long matricula, String nomeCompleto, String email,
	               String telefone, BigDecimal salario,
	               double taxaDeBonificacao, Filial filial) {
		super(matricula, nomeCompleto, email, telefone, salario);
		this.taxaDeBonificacao = taxaDeBonificacao;
		this.filial = filial;
	}

	public Gerente(double taxaDeBonificacao, Filial filial) {
		this.taxaDeBonificacao = taxaDeBonificacao;
		this.filial = filial;
	}

	public double getTaxaDeBonificacao() {
		return taxaDeBonificacao;
	}

	public void setTaxaDeBonificacao(double taxaDeBonificacao) {
		this.taxaDeBonificacao = taxaDeBonificacao;
	}

	public Filial getFilial() {
		return filial;
	}

	public void setFilial(Filial filial) {
		this.filial = filial;
	}

	@Override
	public String toString() {
		return "Gerente{" +
				"taxaDeBonificacao=" + taxaDeBonificacao +
				", filial=" + filial +
				", matricula=" + matricula +
				", nomeCompleto='" + nomeCompleto + '\'' +
				", email='" + email + '\'' +
				", telefone='" + telefone + '\'' +
				", salario=" + salario +
				'}';
	}
}
