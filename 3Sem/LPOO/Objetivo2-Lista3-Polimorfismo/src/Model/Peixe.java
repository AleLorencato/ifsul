package Model;

public class Peixe extends Animal{
	private double z;

	public Peixe() {}

	public Peixe(double x, double y, double z) {
		super(x, y);
		this.z = z;
	}

	public void mover(double x, double y, double z) {
		super.mover(x, y, z);
		this.z = z;
	}

	@Override
	public void desenhar() {
		System.out.println("\n Desenhou um Peixe");
	}
}
