#include <bits/stdc++.h>
using namespace std;

const int N = 1e7;

long long dv[N+10];

int main()
{

    int n;
    cin >> n;

    long long ans = 0;
    for(int i = 1; i <= n; i++)
    {
        for(int j = i; j <= n; j+=i)
        {
            dv[j]++;
        }
    }

    for(long long i = 1; i <= n; i++)
    {
        ans += (i*dv[i]);
    }

    cout << ans << endl;

}
