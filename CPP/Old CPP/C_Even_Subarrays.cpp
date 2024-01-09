#include <iostream>
#include <cstdio>
#include <algorithm>
#include <cmath>

using namespace std;

const int N = 2e5 + 5;
const int M = 1e9 + 7;

int t, n;
int a[N];
int cnt[N];
long long ans;
int num_divisors[N];

int main()
{
    for (int i = 0; i < N; i++)
    {
        num_divisors[i] = 0;
        for (int j = 2; j <= sqrt(i); j++)
        {
            if (i % j == 0)
            {
                num_divisors[i] += 2;
            }
        }
        if (sqrt(i) * sqrt(i) == i)
        {
            num_divisors[i]--;
        }
    }
    scanf("%d", &t);
    while (t--)
    {
        scanf("%d", &n);
        ans = 0;
        for (int i = 1; i <= n; i++)
        {
            scanf("%d", &a[i]);
            cnt[i] = cnt[i - 1] ^ a[i];
        }
        for (int i = 1; i <= n; i++)
        {
            if (num_divisors[cnt[i]] % 2 == 0)
            {
                ans++;
            }
            for (int j = i + 1; j <= n; j++)
            {
                if (num_divisors[cnt[i] ^ cnt[j]] % 2 == 0)
                {
                    ans++;
                }
            }
        }
        printf("%lld\n", ans);
    }
    return 0;
}