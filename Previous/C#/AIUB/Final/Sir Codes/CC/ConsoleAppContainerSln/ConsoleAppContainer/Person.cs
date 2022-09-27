using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppContainer
{
    internal abstract class Person
    {
        private int serialNo = 0;
        private string id; // same object er jonne
        //private string name;
        //private string bloodGroup;
        private DateTime dateOfBirth;

        internal virtual string Id
        {
            get { return this.id; }
            set { this.id = "P-" + value; }
        }

  

        internal string Name { get; private set; }

        internal string BloodGroup { get; set; }

        internal DateTime DateOfBirth
        {
            get { return this.dateOfBirth; }
            set { this.dateOfBirth = value; }
        }

        internal Person() { }
        internal Person(string name, string bloodGroup, DateTime dateOfBirth)
        {
            this.Id = (++serialNo).ToString();
            this.Name = name;
            this.BloodGroup = bloodGroup;
            this.DateOfBirth = dateOfBirth;
        }

        internal virtual void ShowInfo()
        {
            Console.WriteLine("ID: {0}", this.Id);
            Console.WriteLine("Name: {0}", this.Name);
            Console.WriteLine("Blood Group: {0}", this.BloodGroup);
            Console.WriteLine("Date Of Birth: {0}", this.DateOfBirth.ToString("D"));
        }

        internal abstract void M1();

        internal abstract void M2(string y);

    }
}
