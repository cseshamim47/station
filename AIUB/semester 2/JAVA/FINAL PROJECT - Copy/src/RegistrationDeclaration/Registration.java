package RegistrationDeclaration;

public abstract class Registration
{
        protected String fullName;
        protected String username;
        protected String password;
        protected String mailAddress;
        protected String mobile;

    public abstract void setFullName(String fullName) ;
    public abstract void setUsername(String username) ;
    public abstract void setPassword(String password) ;
    public abstract void setMailAddress(String mailAddress) ;
    public abstract void setMobile(String mobile) ;
    public abstract String getFullName() ;
    public abstract String getUsername() ;
    public abstract String getPassword() ;
    public abstract String getMailAddress() ;
    public abstract String getMobile();
}
