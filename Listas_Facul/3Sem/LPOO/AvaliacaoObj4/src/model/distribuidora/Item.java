package model.distribuidora;

import java.math.BigDecimal;

public class Item {
	private Integer quantidade;
	private BigDecimal total;
	private Situacao situacao;

	public Item(Integer quantidade, BigDecimal total, Situacao situacao) {
		this.quantidade = quantidade;
		this.total = total;
		this.situacao = situacao;
	}

	public Item() {}

	public Integer getQuantidade() {
		return quantidade;
	}

	public void setQuantidade(Integer quantidade) {
		this.quantidade = quantidade;
	}

	public BigDecimal getTotal() {
		return total;
	}

	public void setTotal(BigDecimal total) {
		this.total = total;
	}

	public Situacao getSituacao() {
		return situacao;
	}

	public void setSituacao(Situacao situacao) {
		this.situacao = situacao;
	}

	@Override
	public String toString() {
		return "Item{" +
				"quantidade=" + quantidade +
				", total=" + total +
				", situacao=" + situacao +
				'}';
	}
}
