package MetroTickets;

public class TicketInfo {

    protected String travelDate;
    protected String startLocation;
    protected String endLocation;
    protected String quantity;
    protected String trainClass;
    protected String time;
    protected String trainName;
    protected String[] seat = new String[4];
    protected String price;
    protected String paymentMethod;

    public void setTravelDate(String travelDate) {
        this.travelDate = travelDate;
    }

    public void setStartLocation(String startLocation) {
        this.startLocation = startLocation;
    }

    public void setEndLocation(String endLocation) {
        this.endLocation = endLocation;
    }

    public void setQuantity(String quantity) {
        this.quantity = quantity;
    }

    public void setTrainClass(String trainClass) {
        this.trainClass = trainClass;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public void setTrainName(String trainName) {
        this.trainName = trainName;
    }

    public void setSeat(String[] seat) {
        this.seat = seat;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public void setPaymentMethod(String paymentMethod) {
        this.paymentMethod = paymentMethod;
    }

    public String getTravelDate() {
        return travelDate;
    }

    public String getStartLocation() {
        return startLocation;
    }

    public String getEndLocation() {
        return endLocation;
    }

    public String getQuantity() {
        return quantity;
    }

    public String getTrainClass() {
        return trainClass;
    }

    public String getTime() {
        return time;
    }

    public String getTrainName() {
        return trainName;
    }

    public String[] getSeat() {
        return seat;
    }

    public String getPrice() {
        return price;
    }

    public String getPaymentMethod() {
        return paymentMethod;
    }

}

