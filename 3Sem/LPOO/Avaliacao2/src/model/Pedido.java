package model;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.List;

public class Pedido {
	private String numero;
	private LocalDate data;
	private BigDecimal total;
	private List<Item> itens;
	private Estado estado;

	public Pedido(String numero, LocalDate data, BigDecimal total, List<Item> itens, Estado estado) {
		this.numero = numero;
		this.data = data;
		this.total = total;
		this.itens = itens;
		this.estado = estado;
	}

	public String getNumero() {
		return numero;
	}

	public void setNumero(String numero) {
		this.numero = numero;
	}

	public LocalDate getData() {
		return data;
	}

	public void setData(LocalDate data) {
		this.data = data;
	}

	public BigDecimal getTotal() {
		return total;
	}

	public void setTotal(BigDecimal total) {
		this.total = total;
	}

	public List<Item> getItens() {
		return itens;
	}

	public void setItens(List<Item> itens) {
		this.itens = itens;
	}

	public Estado getEstado() {
		return estado;
	}

	public void setEstado(Estado estado) {
		this.estado = estado;
	}

	@Override
	public String toString() {
		return "\nPedido{" +
				"numero='" + numero + '\'' +
				", data=" + data +
				", total=" + total +
				", itens=" + itens +
				", estado=" + estado +
				'}';
	}
}
