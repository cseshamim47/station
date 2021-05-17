package RegistrationDeclaration;

import FileHandling.FileHandling;
import RegistrationImplementation.UserLogin;

import java.io.File;

public class Admin extends User // admin is a user
{
    final String masterKey = "admin";

    User[] users = new User[100];   // association or has a relationship
    Admin[] admins = new Admin[10];
    FileHandling fileHandling = new FileHandling();

    public void insertUser(User user){
        for(int i = 0; i < users.length; i++){
            if(users[i] == null){
                users[i] = user;
                break;
            }
        }
    }

    public void deleteUser(String username){
        int x = 99;
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)){
                users[i] = users[i+1];
                x = i;
            }
        }
        users[x] = null;
    }

    public void showAllUser(){
        int countUser = 0;
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                       ALL USERS INFORMATION                     | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println();
        for(int i = 0; i < users.length; i++){
            if(users[i] != null){
                countUser++;
                System.out.println();
                System.out.println("                                                              User " + countUser + " : ");
                System.out.println("                                                              Full Name : "+ users[i].getFullName());
                System.out.println("                                                              Username : "+ users[i].getUsername());
                System.out.println("                                                              Email : "+ users[i].getMailAddress());
                System.out.println("                                                              Mobile : "+ users[i].getMobile());
                System.out.println("                                                              Academic : "+ users[i].getAcademic());
                System.out.println("                                                              Password : "+ users[i].getPassword());
                System.out.println("                                                              Total Earning : "+ users[i].getTotalEarning()+ " taka");
                System.out.println("                                                              Available to withdraw : "+ users[i].getAvailableToWithdraw() + " taka");
            }
        }
        if(countUser == 0) System.out.println("                                                              No user found in the record!!");
    }

    public boolean usernameValidation(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)) return true;
        }
        return false;
    }

    public boolean emailValidation(String mail){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getMailAddress().equals(mail)) return true;
        }
        return false;
    }
    public void searchUser(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)){
                System.out.println();
                System.out.println("                                                    -----------------------------------------------------------------");
                System.out.println("                                                   |                         SINGLE USER INFO                       | ");
                System.out.println("                                                    -----------------------------------------------------------------");
                System.out.println();

                System.out.println();
//                System.out.println("                                                              User stored at index " + i);
                System.out.println("                                                              Full Name : "+ users[i].getFullName());
                System.out.println("                                                              Username : "+ users[i].getUsername());
                System.out.println("                                                              Email : "+ users[i].getMailAddress());
                System.out.println("                                                              Mobile : "+ users[i].getMobile());
                System.out.println("                                                              Academic : "+ users[i].getAcademic());
                System.out.println("                                                              Password : "+ users[i].getPassword());
                System.out.println("                                                              Total Earning : "+ users[i].getTotalEarning() + " taka");
                System.out.println("                                                              Available to withdraw : "+ users[i].getAvailableToWithdraw()+ " taka");

            }
        }
    }
    public boolean passwordValidation(String username,String password){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getPassword().equals(password) && users[i].getUsername().equals(username)){
                UserLogin.academicUser = users[i].getAcademic();
                UserLogin.academicUserName = users[i].getUsername();
                return true;
            }
        }
        return false;
    }

    public void setUserReveneu(String username,double totalEarning, double reveneu){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)) {
                users[i].setTotalEarning(users[i].getTotalEarning()+totalEarning);
                users[i].setAvailableToWithdraw(users[i].getAvailableToWithdraw()+reveneu);
                break;
            }
        }
    }

    public void withdraw(String username,double amount){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)) {
                if(users[i].getAvailableToWithdraw() > amount && amount >= 10 && users[i].getAvailableToWithdraw() - amount >= 10){
                    users[i].setAvailableToWithdraw(users[i].getAvailableToWithdraw() - amount);
                    System.out.println("\n                                                              Withdraw of taka "+ amount+" successfull!!");
                    System.out.println("                                                              Available balance : "+ users[i].getAvailableToWithdraw() + " taka");
                    String history = username + " has withdrawn " + amount + " taka";
                    fileHandling.writeInFile(history);
                    break;
                }else System.out.print("\n                                                              Insufficient fund or something went wrong!!!");
            }
        }
//        setAdminTransactionHistory(fileHandling);
    }

    public void setAdminTransactionHistory(FileHandling fileHandling){
        this.fileHandling = fileHandling;
    }
    public FileHandling getAdminTransactionHistory(){ return fileHandling; }

    public double availableBalance(String username){
        for(int i = 0; i < users.length; i++){
            if(users[i] != null && users[i].getUsername().equals(username)) {
                return users[i].getAvailableToWithdraw();
            }
        }
        return -1;
    }

    public String getMasterKey(){ return masterKey; }

    public boolean adminUsernameValidation(String username){
        for(int i = 0; i < admins.length; i++){
            if(admins[i] != null && admins[i].getUsername().equals(username)) return true;
        }
        return false;
    }
    public boolean adminPasswordValidation(String password){
        for(int i = 0; i < admins.length; i++){
            if(admins[i] != null && admins[i].getPassword().equals(password)) return true;
        }
        return false;
    }
    public void insertAdmin(Admin admin){
        for(int i = 0; i < admins.length; i++){
            if(admins[i] == null){
                admins[i] = new Admin();
                admins[i] = admin;
                break;
            }
        }
    }

    public void showAlladmin(){
        int countUser = 0;
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                       ALL ADMIN INFORMATION                     | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println();
        for(int i = 0; i < admins.length; i++){
            if(admins[i] != null){
                countUser++;
                System.out.println();
                System.out.println("                                                              User " + countUser + " : ");
                System.out.println("                                                              Username : "+ admins[i].getUsername());
                System.out.println("                                                              Password : "+ admins[i].getPassword());
            }
        }
        if(countUser == 0) System.out.println("                                                              No admin found in the record!!");
    }
}
