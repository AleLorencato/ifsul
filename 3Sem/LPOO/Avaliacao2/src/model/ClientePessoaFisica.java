package model;

import java.util.List;

public class ClientePessoaFisica extends Cliente {
	private String cpf;

	public ClientePessoaFisica(String nomeCompleto, String email, String telefone,
			List<Pedido> pedidos, EnderecoDeCobranca enderecosCobrancas,
			EnderecoDeEntrega enderecosEntregas, String cpf) {
		super(nomeCompleto, email, telefone, pedidos, enderecosCobrancas, enderecosEntregas);
		this.cpf = cpf;
	}

	public String getCpf() {
		return cpf;
	}

	public void setCpf(String cpf) {
		this.cpf = cpf;
	}

	@Override
	public String toString() {
		return "ClientePessoaFisica{" +
				"cpf='" + cpf + '\'' +
				", nomeCompleto='" + nomeCompleto + '\'' +
				", email='" + email + '\'' +
				", telefone='" + telefone + '\'' +
				", pedidos=" + pedidos +
				", enderecosCobrancas=" + enderecosCobrancas +
				", enderecosEntregas=" + enderecosEntregas +
				'}';
	}
}
