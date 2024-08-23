package model.empresa;

import model.distribuidora.Pedido;

import java.math.BigDecimal;
import java.util.List;

public class Vendedor extends Funcionario {
	private double taxaDeComissao;
	private List<Pedido> pedidos;
	private Regiao regiao;

	public Vendedor(Long matricula, String nomeCompleto, String email, String telefone,
	                BigDecimal salario, double taxaDeComissao,
	                List<Pedido> pedidos, Regiao regiao) {
		super(matricula, nomeCompleto, email, telefone, salario);
		this.taxaDeComissao = taxaDeComissao;
		this.pedidos = pedidos;
		this.regiao = regiao;
	}

	public Vendedor(double taxaDeComissao, List<Pedido> pedidos, Regiao regiao) {
		this.taxaDeComissao = taxaDeComissao;
		this.pedidos = pedidos;
		this.regiao = regiao;
	}

	public Vendedor() {

	}

	public double getTaxaDeComissao() {
		return taxaDeComissao;
	}

	public void setTaxaDeComissao(double taxaDeComissao) {
		this.taxaDeComissao = taxaDeComissao;
	}

	public List<Pedido> getPedidos() {
		return pedidos;
	}

	public void setPedidos(List<Pedido> pedidos) {
		this.pedidos = pedidos;
	}

	@Override
	public String toString() {
		return "Vendedor{" +
				"taxaDeComissao=" + taxaDeComissao +
				", pedidos=" + pedidos +
				", regiao=" + regiao +
				", matricula=" + matricula +
				", nomeCompleto='" + nomeCompleto + '\'' +
				", email='" + email + '\'' +
				", telefone='" + telefone + '\'' +
				", salario=" + salario +
				'}';
	}
}

