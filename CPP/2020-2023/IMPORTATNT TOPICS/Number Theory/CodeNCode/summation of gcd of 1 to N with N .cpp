#include <bits/stdc++.h>
using namespace std;


// given q queries, in each query 
// answer summation of gcd of 1 to n with n
int main()
{

    vector<int> phi(1e5+10);

    phi[1] = 1;
    for(int i = 2; i <= 1e5; i++)
    {
        phi[i] = i-1;
    }

    for(int i = 2; i <= 1e5; i++)
    {
        for(int j = i+i; j <= 1e5; j+=i)
        {
            phi[j] -= phi[i]; 
        }
    }

    int q;
    cin >> q;

    while(q--)
    {
        int n;
        cin >> n;
        int ans = 0;
        for(int i = 1; i*i <= n; i++)
        {
            if(n%i == 0)
            {
                ans += i*phi[n/i];
                if(n/i != i)
                {
                    ans += (n/i)*phi[i];
                }
            }
        }    
        cout << ans << endl;
    }
    
}