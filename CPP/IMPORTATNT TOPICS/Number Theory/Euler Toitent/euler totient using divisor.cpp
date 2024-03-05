#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    vector<int> et(n,0);
    et[1] = 1;
    for(int i = 2; i <= n; i++) et[i] = i-1;
    cout << 1 << " : " << et[1] << endl;
    for(int d = 2; d <= n; d++) 
    {
        for(int i = d+d; i <= n; i+=d)
        {
            et[i] -= et[d];
        }
        cout << d << " : " << et[d] << endl;
    }


}