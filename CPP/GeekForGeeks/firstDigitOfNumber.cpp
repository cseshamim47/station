#include <iostream>
using namespace std;

int main()
{
    #include <iostream>
using namespace std;

int main()
{
    int i=1, n;
    cin >> n;
    // n = 3;
    while(i <= n){
        int j = 1;
        while(j <= n-i){
            cout << " ";
            j++;
        }

        while(j<=n){
            cout << "*";
            j++;
        }
        cout << "\n";

        i++;
    }
   
}
    
}