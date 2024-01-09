using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppPropertiesPro
{
    struct Address
    {
        private byte houseNo;
        private byte roadNo;
        private ushort postalCode;
        private string district;

        public Address(byte houseNo, byte roadNo, ushort postalCode, string district)
        {
            this.houseNo = houseNo;
            this.roadNo = roadNo;
            this.postalCode = postalCode;
            this.district = district;
        }

        public void PrintAddress()
        {
            Console.WriteLine("House No: {0}", this.houseNo);
            Console.WriteLine("Road No: {0}", this.roadNo);
            Console.WriteLine("Postal Code: {0}", this.postalCode);
            Console.WriteLine("District: {0}\n", this.district);
        }
    }

    class Student
    {
        public const int a = 100;
        public readonly int r;

        private int id;
        private string name;
        private Address studentAddress;

        public int Id
        {
            get { return this.id; }
            set
            {
                if (value >= 100)
                    this.id = value;
                else
                    this.id = -1;
            }
        }

        public string Name
        {
            get { return this.name; }
            set { this.name = value; }
        }

        public Address StudentAddress
        {
            get { return this.studentAddress; }
            set { this.studentAddress = value; }
        }

        public int GetId()
        {
            return this.id;
        }

        public void SetId(int id)
        {
            if (id >= 100)
                this.id = id;
            else
                this.id = -1;
        }

        public string GetName()
        {
            return this.name;
        }

        public void SetName(string name)
        {
            this.name = name;
        }

        public Address GetAddress()
        {
            return this.studentAddress;
        }

        public void SetAddress(Address studentAddress)
        {
            this.studentAddress = studentAddress;
        }

        public Student()
        {
            r = 34;
            r++;
        }

        public Student(int id, string name, Address studentAddress)
        {
            r = 76;
            this.Id = id;//this.SetId(id);//this.id = id;
            this.Name = name;//this.SetName(name);//this.name = name;
            this.StudentAddress = studentAddress;//this.SetAddress(studentAddress);//this.studentAddress = studentAddress;
        }

        public void ShowStudentInfo()
        {
            Console.WriteLine("Student's Information\n------------------");
            Console.WriteLine("Student's ID: {0}", this.Id);//this.GetId());//this.id);
            Console.WriteLine("Student's Name: {0}", this.Name);//this.GetName());//this.name);
            Console.WriteLine("Student's Address");
            this.StudentAddress.PrintAddress();//this.GetAddress().PrintAddress();//this.studentAddress.PrintAddress();
        }

    }
}
