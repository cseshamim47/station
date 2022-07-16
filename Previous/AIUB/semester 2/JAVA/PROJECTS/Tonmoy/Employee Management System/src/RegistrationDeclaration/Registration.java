package RegistrationDeclaration;

public abstract class Registration // abstraction + encapsulation
{
    protected String fullName;
    protected String username;
    protected String password;
    protected String mailAddress;
    protected String mobile;
    protected String academic;
    protected double totalEarning;
    protected double availableToWithdraw;


    public abstract void setFullName(String fullName) ;
    public abstract void setUsername(String username) ;
    public abstract void setPassword(String password) ;
    public abstract void setMailAddress(String mailAddress) ;
    public abstract void setMobile(String mobile) ;
    public abstract void setAcademic(String academic);
    public abstract void setTotalEarning(double totalEarning);
    public abstract void setAvailableToWithdraw(double availableToWithdraw);

    public abstract String getFullName() ;
    public abstract String getUsername() ;
    public abstract String getPassword() ;
    public abstract String getMailAddress() ;
    public abstract String getMobile();
    public abstract String getAcademic();
    public abstract double getTotalEarning();
    public abstract double getAvailableToWithdraw();

}
