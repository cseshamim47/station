#include <bits/stdc++.h>
using namespace std;

mt19937_64 rang(chrono::high_resolution_clock::now().time_since_epoch().count());
int rng(int lim) {
uniform_int_distribution<int> uid(1,lim);
return uid(rang);
}

int main()
{
    freopen("output.txt", "w", stdout);
    int t = 100;

    cout << t << endl;

    while(t--)
    {
        int n = rng(5);
        cout << n << endl;
        for(int i = 0; i < n; i++)
        {
            for(int j = 0; j < n; j++)
            {
                cout << rng(1000) << " ";
            }
            cout << endl;
        }
    }



}