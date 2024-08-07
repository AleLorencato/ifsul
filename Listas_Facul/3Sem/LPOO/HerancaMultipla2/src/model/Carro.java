package model;

public class Carro extends Veiculo implements Automovel {
	private int capacidadePortaMalas;

	public int getCapacidadePortaMalas() {
		return capacidadePortaMalas;
	}

	public void setCapacidadePortaMalas(int capacidadePortaMalas) {
		this.capacidadePortaMalas = capacidadePortaMalas;
	}

	@Override
	public String toString() {
		return "Carro{" +
				"capacidadePortaMalas=" + capacidadePortaMalas +
				'}';
	}

	@Override
	public String getRenavam() {
		return "";
	}

	@Override
	public void setRenavam(String renavam) {

	}

	@Override
	public String getChassi() {
		return "";
	}

	@Override
	public void setChassi(String chassi) {

	}

	@Override
	public String getPlaca() {
		return "";
	}

	@Override
	public void setPlaca(String placa) {

	}
}
