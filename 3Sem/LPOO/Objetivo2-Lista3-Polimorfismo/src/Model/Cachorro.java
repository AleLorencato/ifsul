package Model;

public class Cachorro extends Animal{
	public Cachorro() {
	}
	public Cachorro(double x, double y) {
		super(x, y);
	}

	@Override
	public void desenhar() {
		System.out.println("\nDesenhou um Cachorro.");
	}

	@Override
	public String toString() {
		return "Cachorro{" +
				"x=" + x +
				", y=" + y +
				'}';
	}
}
