package model;

import java.util.ArrayList;
import java.util.List;

public abstract class Cliente {
	protected String nomeCompleto;
	protected String email;
	protected String telefone;
	protected List<Pedido> pedidos;
	protected EnderecoDeCobranca enderecosCobrancas;
	protected EnderecoDeEntrega enderecosEntregas;

	public Cliente(String nomeCompleto, String email, String telefone, List<Pedido> pedidos,
			EnderecoDeCobranca enderecosCobrancas, EnderecoDeEntrega enderecosEntregas) {
		this.nomeCompleto = nomeCompleto;
		this.email = email;
		this.telefone = telefone;
		this.pedidos = pedidos;
		this.enderecosCobrancas = enderecosCobrancas;
		this.enderecosEntregas = enderecosEntregas;
	}

	public String getNomeCompleto() {
		return nomeCompleto;
	}

	public void setNomeCompleto(String nomeCompleto) {
		this.nomeCompleto = nomeCompleto;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getTelefone() {
		return telefone;
	}

	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}

	public List<Pedido> getPedidos() {
		return pedidos;
	}

	public void setPedidos(List<Pedido> pedidos) {
		this.pedidos = pedidos;
	}

	public EnderecoDeCobranca getEnderecosCobrancas() {
		return enderecosCobrancas;
	}

	public void setEnderecosCobrancas(EnderecoDeCobranca enderecosCobrancas) {
		this.enderecosCobrancas = enderecosCobrancas;
	}

	public EnderecoDeEntrega getEnderecosEntregas() {
		return enderecosEntregas;
	}

	public void setEnderecosEntregas(EnderecoDeEntrega enderecosEntregas) {
		this.enderecosEntregas = enderecosEntregas;
	}

	@Override
	public String toString() {
		return "Cliente{" +
				"nomeCompleto='" + nomeCompleto + '\'' +
				", email='" + email + '\'' +
				", telefone='" + telefone + '\'' +
				", pedidos=" + pedidos +
				", enderecosCobrancas=" + enderecosCobrancas +
				", enderecosEntregas=" + enderecosEntregas +
				'}';
	}

}
