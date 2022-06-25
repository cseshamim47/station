using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using ConsoleAppClass;

namespace ConsoleAppClassConsoleAppClass.Program
{
    class Program
    {

        static void Main(string[] args)
        {
            //AddressFormat address1 = new AddressFormat(2, 5, 1290, "Sylhet");

            Student studentOne = new Student();
            studentOne.SetId(1);//studentOne.id = 1;
            studentOne.SetName("Bruce");//studentOne.name = "Bruce";
            studentOne.SetCgpa(4.62);//studentOne.cgpa = 3.72;
            studentOne.SetBloodGroup("AB+");//studentOne.bloodGroup = "A+";
            studentOne.SetAddress(new AddressFormat(2, 5, 1290, "Sylhet"));//studentOne.address = address1;
            studentOne.PrintStudentInfo();
            
            Student studentTwo = new Student(2, "Clerk", -3.24, "O+", new AddressFormat(45, 52, 1280, "Khulna"));
            studentTwo.PrintStudentInfo();
        }
    }
}
