package Model;

public class Cliente implements Investidor{
    private String ticker;
    private int quantidade;

    @Override
    public String getTicker() {
        return this.ticker;
    }

    @Override
    public void setTicker(String ticker) {
        this.ticker = ticker;
    }

    @Override
    public int getQuantidade() {
        return this.quantidade;
    }

    @Override
    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return "Cliente{" +
                "ticker='" + ticker + '\'' +
                ", quantidade=" + quantidade +
                '}';
    }
}
