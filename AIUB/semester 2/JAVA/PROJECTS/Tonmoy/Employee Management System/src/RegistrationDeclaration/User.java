package RegistrationDeclaration;

public class User extends Registration // inheritance + polymorphism + dynamic polymorphism/method overriding
{
    public User(){}

    public void setFullName(String fullName) {this.fullName = fullName;}

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

    public void setAcademic(String academic) {
        this.academic = academic;
    }

    public void setTotalEarning(double totalEarning) {
        this.totalEarning = totalEarning;
    }

    public void setAvailableToWithdraw(double availableToWithdraw) {
        this.availableToWithdraw = availableToWithdraw;
    }

    public String getFullName() {return fullName;}

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

    public String getAcademic() {
        return academic;
    }

    public double getTotalEarning() {
        return totalEarning;
    }

    public double getAvailableToWithdraw() {
        return availableToWithdraw;
    }


}
