using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Pharmacy_Management_System
{
    internal static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new Splash());
            //Application.Run(new LoginScreen());


            // Application.Run(new AdminPanel());
            //Application.Run(new MedicineManagement());
            //Application.Run(new OrderMedicine());
            //Application.Run(new AdminProfile());
            //Application.Run(new EmployeeManagement());

        }
    }
}
