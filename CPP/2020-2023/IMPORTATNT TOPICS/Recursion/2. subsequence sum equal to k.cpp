#include <bits/stdc++.h>
using namespace std;

vector<int> v;
int arr[4] = {1,2,1,0};
int k = 2;
void printAll(int idx,int sum) // TC: O(n * 2^n) // SC : O(n)
{   
    if(idx == 4)
    {
        if(sum == k)
        {
            for(auto x : v) cout << x << ' ';
            cout << endl;
        }
        return;
    }

    v.push_back(arr[idx]);
    printAll(idx+1,sum + arr[idx]);
    v.pop_back();
    printAll(idx+1, sum);

}

bool printOne(int idx,int sum) // TC: O(n * 2^n) // SC : O(n)
{   
    if(idx == 4)
    {
        if(sum == k)
        {
            for(auto x : v) cout << x << ' ';
            cout << endl;
            return true;
        }
        return false;
    }

    v.push_back(arr[idx]);
    if(printOne(idx+1,sum + arr[idx]) == true)
    {
        return true;
    }
    v.pop_back();
    if(printOne(idx+1, sum) == true) 
    {
        return true;
    }
    return false;
}

int count(int idx,int sum) // TC: O(2^n) // SC : O(n)
{   
    if(sum > k) return 0;
    if(idx == 4)
    {
        if(sum == k)
        {
            return 1;
        }
        return 0;
    }

    int a = count(idx+1,sum + arr[idx]);
    int b = count(idx+1, sum);
    return a + b;

}

int main()
{
    //    Bismillah
    // printAll(0,0);
    // printOne(0,0);
    cout << count(0,0) << endl;
}