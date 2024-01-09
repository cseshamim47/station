// abstraction  -> 
/* 
1. cannot create any object
2. pure virtual function -> no body
3. pointer -> can create object
4. constructor  
*/

#include <bits/stdc++.h>
using namespace std;

struct Address
{
    string houseNo,roadNo;
    string block;
    string loc;

    string fullAddress()
    {
        return ("House No - " + 
        houseNo + ", Road No - " + roadNo + ", Block - " + 
        block + ", " + loc);
    }
};

class Person{
    protected:
    string name;
    int roll, grade;
    double gpa;
    Address address;
    bool isValid;

    public:
    virtual string GetName() = 0;
    virtual int GetRoll() = 0;
    virtual int GetGrade() = 0;
    virtual double GetGpa() = 0;
    virtual Address GetAddress() = 0;
    virtual bool GetValidity() = 0;
    virtual void print() = 0;
    virtual void SetName(string name) = 0;
    virtual void SetRoll(int roll) = 0;
    virtual void SetGpa(double gpa) = 0;
    virtual void SetGrade(int grade) = 0;
    virtual void SetAddress(Address address) = 0;
    virtual void SetValidity(bool isValid) = 0;
};
/// IS A relationship -> inheritance
/// HAS A relationship -> Composition, Aggregation, Association

class Student : public Person{
    public:
    Student()
    {
        this->name = ""; 
        this->roll = 0;
        this->grade = 0;
        this->gpa = 0;
        this->isValid = false;
    }
    Student(string name, int roll, int grade, double gpa, Address address,bool isValid = true) /// parameterized constructor
    {
        this->name = name; 
        this->roll = roll;
        this->grade = grade;
        this->gpa = gpa;
        this->address = address;
        this->isValid = true;
    }

    void SetName(string name) override
    {
        this->name = name;
    }
    void SetRoll(int roll) override
    {
        this->roll = roll;
    }
    void SetGrade(int grade) override
    {
        this->grade = grade;
    }
    void SetGpa(double gpa) override
    {
        this->gpa = gpa;
    }
    void SetAddress(Address address) override
    {
        this->address = address;
    }
    void SetValidity(bool isValid = true) override
    {
        this->isValid = isValid;
    }
    string GetName() override {return name;}
    int GetRoll() override {return roll;}
    int GetGrade() override {return grade;}
    double GetGpa() override {return gpa;}
    Address GetAddress() override {return address;}
    bool GetValidity() override {return isValid;}


    void print() override
    {
        if(GetValidity())
        {
            cout << "\nStudent Info" << endl;
            cout << "Name : " << GetName() << endl;
            cout << "Grade : Class " << GetGrade() << endl;
            cout << "Roll : " << GetRoll() << endl;
            cout << "Gpa : " << GetGpa() << endl;
            cout << "Address : " << GetAddress().fullAddress() << endl;
        }else cout << "\nNo student found!!" << endl;
    }

    /// CRUD -> Create, Read, Update, Delete
}; 

int main()
{
    

    Address address{"37","15","D","Banani"};
    // address.houseNo = "37";
    // address.roadNo = "15";
    // address.block = "D";
    // address.loc = "Banani";
    // cout << address.fullAddress() << endl;

    Student *student[100];
    // string name, int roll, int grade, double gpa, Address address,bool isValid = true
    student[0] = new Student("Md Shamim Ahmed", 56, 6, 4.65, address, true);
    student[1] = new Student();
    student[1]->SetName("Md Shamim Ahmed");
    student[1]->SetRoll(1);
    student[1]->SetGpa(4.65);
    student[1]->SetValidity(true);
    student[1]->SetGrade(10);
    student[0]->SetValidity(false);
    student[1]->SetName("Taiyaba");
    student[0]->print();
    student[1]->print();
    // Person *p = new Person();
    // cout << p->GetName() << endl;

    // Student *s = new Student("Taiyaba");
    // cout << s->GetName() << endl;

    // Person *newP;
    // newP = new Student("Taiyaba");
    // cout << newP->GetName() << endl;


}
