#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t;
    cin >> t;
    while(t--)
    {
        int candies;
        cin >> candies;
        if(candies < 3)
        {
            cout << 0 << "\n";
            continue;
        }
        if(candies & 1) cout << candies/2 << endl;
        else cout << (candies/2)-1 << "\n";
    }
}