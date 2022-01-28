// inheritance + polymorphism + dynamic polymorphism/method overriding

package Declaration;

public class User extends Storage { // Fully Operational

    public User() {

    }

    // Setters
    public void setFullName(String fullName) {
        this.fullName = fullName;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public void setMailAddress(String mailAddress) {
        this.mailAddress = mailAddress;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile;
    }

    public void setMovie(String movie) {
        this.movie = movie;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public void setTiming(String timing) {
        this.timing = timing;
    }

    // Getters
    public String getFullName() {
        return fullName;
    }

    public String getUsername() {
        return username;
    }

    public String getPassword() {
        return password;
    }

    public String getMailAddress() {
        return mailAddress;
    }

    public String getMobile() {
        return mobile;
    }

    public String getMovie() {
        return movie;
    }

    public String getPrice() {
        return price;
    }

    public String getTiming() {
        return timing;
    }

}