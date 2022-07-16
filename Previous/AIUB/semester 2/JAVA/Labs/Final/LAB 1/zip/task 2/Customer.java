import java.lang.*;

public class Customer {

    private String custName;
    private String custNid;

    public Customer() {}

    public Customer(String custName, String custNid) {
        this.custName = custName;
        this.custNid = custNid;

    }

    public void setCustName(String custName) {
        this.custName = custName;
    }

    public void setCustNid(String custNid) {
        this.custNid = custNid;
    }

    public String getCustName() {
        return custName;
    }

    public String getCustNid() {
        return custNid;
    }

}