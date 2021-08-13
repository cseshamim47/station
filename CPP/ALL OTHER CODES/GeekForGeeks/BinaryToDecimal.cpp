#include <iostream>
using namespace std;

int main()
{
    int n;
    cin >> n;

    int ans = 0;
    int base = 1;

    while(n > 0){
        int last_digit = n % 10;
        ans = ans + (base * last_digit);
        n = n/10;
        base = base * 2;
    }

    cout << ans << endl;
    
}