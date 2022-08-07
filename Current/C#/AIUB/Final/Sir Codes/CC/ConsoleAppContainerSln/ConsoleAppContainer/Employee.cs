using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppContainer
{
    internal class Employee : Person
    {
        private double salary;

        internal double Salary
        {
            get { return this.salary; }
            set
            {
                if (value >= 0)
                    this.salary = value;
                else
                    this.salary = -2;
            }
        }

        internal override string Id
        {
            set { base.Id = value + "-E"; }
        }

        internal Employee(string name, string bloodGroup, DateTime dateOfBirth, double salary) : base(name, bloodGroup, dateOfBirth)
        {
            this.Salary = salary;
        }

        internal override void ShowInfo()
        {
            base.ShowInfo();
            Console.WriteLine("Salary: {0}\n", this.Salary);
        }

        internal override void M1()
        { 
        }

        internal override void M2(string y)
        { 
        }

    }
}
