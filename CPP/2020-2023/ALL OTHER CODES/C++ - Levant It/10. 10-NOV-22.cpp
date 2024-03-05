// Class 10 :
// recursion -> re-occur
// File input
// STL : list, set
// Random Number generator
// C++ Class introduction 1
// Problem Solving : pattern printing

#include <bits/stdc++.h>
using namespace std;
// 0 1 1 2 3 5 8 13


int fib(int n)
{
    if(n <= 1) return n; 
    int a = fib(n-2);
    int b = fib(n-1);
    int sum = a + b;
    return sum;
}

// int fact()
// {

// }

// int palindrome(int l, int r)
// {

// }

void print(int n) // 3
{   
    if(n == 0)
    {
        cout << endl;
        return;
    }

    cout << n << " ";

    print(n-1);

    cout << n << " "; // 1,2,3 
}


int main()
{

    cout << fib(6) << endl;
    // abcba

    string palin;
    cin >> palin;

    int l = 0, r = palin.size()-1;
    while(l <= r)
    {
        if(palin[l] != palin[r]) 
        {
            cout << "Not palindrome" << endl;
            return 0;
        }else l++,r--;
    }
    cout << "Palindrome" << endl;
    getchar();
    getchar();
    string cp = palin;

    reverse(palin.begin(),palin.end());
    if(palin == cp) cout << "Palindrome" << endl;
    else cout << "Not Palindrome" << endl;

    print(5);

    // set -> {1,2,3}, {3,2,1}
    set<int> s;
    s.insert(2);
    s.insert(3);
    s.insert(100);
    if(s.count(100) == false) cout << "100 nai" << endl; 
    s.erase(3);
    for(auto x : s) 
    {
        cout << x << " ";
    }



    ofstream file;
    file.open("coffee.txt",ios::out|ios::app);
    string str;
    getline(cin,str);
    file <<"Hello , "<<  str << endl;
    
    file.close();

    //freopen("input.txt", "r", stdin);
    //freopen("output.txt", "w", stdout);

    // string str;
    // getline(cin,str);
    // cout << str << endl;

    exit(0);


    // time
    srand(time(0));
    for(int i = 0; i < 5; i++)
    {
        cout << (rand()%6)+1 << endl;
    }
/// diamond
    int n,a,b,d;
    cin >> n >> a >> b >> d;

    int arr[n][n];
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            int dist = abs(a-i) + abs(b-j);
            if(dist <= d) arr[i][j] = 1;
            else arr[i][j] = 0;
        }
    }

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            if(arr[i][j] == 0) cout << " ";
            else 
            cout << arr[i][j];
        }
        cout << endl;
    }
}